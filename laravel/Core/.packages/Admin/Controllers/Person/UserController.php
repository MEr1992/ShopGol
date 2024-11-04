<?php

namespace Admin\Controllers\Person;

use Admin\Controllers\Public\BaseAbstract;
use Models\Edu\{Register, Assignment\Assignment, Survey\Survey, CoursePresented, OnlineClassroom\OnlineClassroom,Quiz\Quiz};
use Models\Base\YearSemester;
use DateTime;
use DateInterval;
use Verta;
use Carbon\Carbon;

class UserController extends BaseAbstract
{
    protected $model = "Models\Person\User";
    protected $request = "Publics\Requests\Person\UserRequest";
    protected $with = ["role", "gender", "activeStatus"];
    protected $showWith = ["activeStatus", "role", "gender"];
    protected $searchFilter = ["firstname", "lastname", "email", "mobile"];
    protected $files = ["photo"];

    public function init()
    {
        $this->storeQuery = function ($query) {
            if (request()->_method != "PUT") {
                $query->password = bcrypt(request()->email);
            }
            $query->save();
        };

        $this->needles = [
            \Person\Role::class => fn($query) => $query->active(),
            \Base\Gender::class,
        ];
    }

    public function showInfo($id)
    {
        $data = [
            "item" => $this->model::with($this->with)->find($id),
            "registers" => Register::with("course","role")->where("user_id", $id)->orderBy("group", "desc")->get(),
        ];
        return response()->json($data);
    }

    public function changePassword()
    {
        $userId = request()->id > 0 ? request()->id : $this->user->id;

        request()->validate([
            'new_password' => 'required|confirmed',
        ]);

        $user = $this->model::find($userId);
        $user->password = bcrypt(request()->new_password);
        $user->save();

        return response()->json(['status' => 200]);
    }

    
    public function getAllEvents()
    {
        $year = $this->getCurrentYearSemester();
        $registers = $this->getUserRegisters($this->user->id, $year->year . $year->semester);

        $courseCodes = $registers->pluck('code');
        $groups = $registers->pluck('group');

        $now = Verta::now();

        $previousMonth = $now->copy()->subMonth()->format('Y/m/d');
        $nextMonth = $now->copy()->addMonth()->format('Y/m/d');
      
        $events = array_merge(
            // $this->processCourseUsersForEvents($this->getUserWithCourseUsers($this->user->id, $courseCodes, $groups, $previousMonth, $nextMonth)),
            $this->processClassesForEvents($this->getClasses($courseCodes, $groups, $previousMonth, $nextMonth)),
            $this->processQuizForEvents($this->getQuiz($courseCodes, $groups, $previousMonth, $nextMonth)),
            $this->processAssignmentsForEvents($this->getAssignments($courseCodes, $groups, $previousMonth, $nextMonth)),
            $this->processSurveysForEvents($this->getSurveys($courseCodes, $groups, $previousMonth, $nextMonth)),
        );

        return response()->json($events);
    }

    protected function getCurrentYearSemester()
    {
        return YearSemester::where("courrent", 1)->first();
    }

    protected function getUserRegisters($userId, $courrent)
    {
        return Register::where("user_id", $userId)
            ->where("group", "LIKE", "$courrent%")
            ->get();
    }

    protected function getAssignments($courseCodes, $groups, $previousMonth, $nextMonth)
    {
        return Assignment::whereIn('course_id', $courseCodes)
            ->whereIn('group', $groups)
            ->where(function ($query) use ($previousMonth, $nextMonth) {
                $query->whereBetween('start_date', [$previousMonth, $nextMonth])
                    ->orWhereBetween('expire_date', [$previousMonth, $nextMonth]);
            })
            ->get();
    }

    protected function getSurveys($courseCodes, $groups, $previousMonth, $nextMonth)
    {
        return Survey::whereIn('course_id', $courseCodes)
            ->whereIn('group', $groups)
            ->whereBetween('start_date', [$previousMonth, $nextMonth])
            ->get();
    }

    protected function getClasses($courseCodes, $groups, $previousMonth, $nextMonth)
    {
        return OnlineClassroom::whereIn('course_id', $courseCodes)
            ->whereIn('group', $groups)
            ->whereBetween('date', [$previousMonth, $nextMonth])
            ->get();
    }

    protected function getQuiz($courseCodes, $groups, $previousMonth, $nextMonth)
    {
        return Quiz::whereIn('course_id', $courseCodes)
            ->whereIn('group', $groups)
            ->where(function ($query) use ($previousMonth, $nextMonth) {
                $query->whereBetween('start_date', [$previousMonth, $nextMonth])
                    ->orWhereBetween('end_date', [$previousMonth, $nextMonth]);
            })
            ->get();
    }

    protected function getUserWithCourseUsers($userId, $courseCodes, $groups, $previousMonth, $nextMonth)
    {
        return $this->model::with(['courseUsers' => function ($q) use ($courseCodes, $groups, $previousMonth, $nextMonth) {
            $q->whereIn('course_users.code', $courseCodes)
            ->whereIn('course_users.group', $groups);
        }])->find($userId);
    }

    protected function processCourseUsersForEvents($courseUsers)
    {
        return $courseUsers->map(function ($courseUser) {
            if (!is_null($courseUser->pivot->start_date)) {
                $startDate = explode('/', $courseUser->pivot->start_date);
                $start = $this->convertJalaliToGregorian($startDate);
                return [
                    'title' => "دوره :" . $courseUser->title,
                    'start' => $start,
                    'end' => $start,
                    'url' => '/panel/courses/' . $courseUser->code,
                ];
            }
            return null;
        })->filter()->all();
    }

    protected function processClassesForEvents($classes)
    {
        $classesArray = $classes->toArray(); // Convert the collection to an array

        return array_map(function ($classe) {
            $startDate = explode('/', $classe['date']); // Access the array key
            $startHour = explode(':', $classe['start_hour']);
            $endTime = $this->calculateEndTime($classe['start_hour'], $classe['duration']);
            $endHour = explode(':', $endTime);

            return [
                'title' => "کلاس : " . $classe['title'],
                'start' => $this->convertJalaliToGregorianWithTime($startDate, $startHour),
                'end' => $this->convertJalaliToGregorianWithTime($startDate, $endHour),
                'url' => '/panel/courses/' . $classe['course_id'] . "/tools/onlineClassroom/" . $classe['id'],
            ];
        }, $classesArray);
    }

    protected function processQuizForEvents($quiz)
    {
        $quizArray = $quiz->toArray(); // Convert the collection to an array

        return array_map(function ($q) {
            $startDate = explode('/', $q['start_date']); // Access the array key
            $endDate = explode('/', $q['end_date']); // Access the array key
            $startHour = explode(':', $q['start_time']);
            $endHour = explode(':', $q['end_time']);

            return [
                'title' => "آزمون : " . $q['title'],
                'start' => $this->convertJalaliToGregorianWithTime($startDate, $startHour),
                'end' => $this->convertJalaliToGregorianWithTime($endDate, $endHour),
                'url' => '/panel/courses/' . $q['course_id'] . "/tools/quiz/" . $q['id'],
            ];
        }, $quizArray);
    }

    protected function processAssignmentsForEvents($assignments)
    {
        return $assignments->map(function ($assignment) {
            $startDate = explode('/', $assignment->start_date);
            $expireDate = explode('/', $assignment->expire_date);

            return [
                'title' => "تکلیف :" . $assignment->title,
                'start' => $this->convertJalaliToGregorian($startDate),
                'end' => $this->convertJalaliToGregorian($expireDate),
                'url' => '/panel/courses/' . $assignment->course_id . "/tools/assignment/" . $assignment->id,
            ];
        })->all();
    }

    protected function processSurveysForEvents($surveys)
    {
        return $surveys->map(function ($survey) {
            $startDate = explode('/', $survey->start_date);

            return [
                'title' => "نظرسنجی :" . $survey->title,
                'start' => $this->convertJalaliToGregorian($startDate),
                'end' => $this->convertJalaliToGregorian($startDate),
                'url' => '/panel/courses/' . $survey->course_id . "/tools/survey/" . $survey->id,
            ];
        })->all();
    }

    protected function convertJalaliToGregorian(array $date)
    {
        // بررسی اینکه تاریخ ورودی به درستی تعریف شده است
        if (count($date) !== 3) {
            throw new InvalidArgumentException('Date array must contain exactly three elements: year, month, and day.');
        }

        // تبدیل تاریخ شمسی به میلادی
        $gregorianDateArray = Verta::jalaliToGregorian((int)$date[0], (int)$date[1], (int)$date[2]);


        return $gregorianDateArray;
    }


    private function convertJalaliToGregorianWithTime(array $date, array $time)
    {
        $gregorianDate = $this->convertJalaliToGregorian($date);
        if(is_array($time)) return array_merge($gregorianDate, $time);
        else return $gregorianDate;
    }

    private function calculateEndTime($startHour, $duration)
    {
        $startTime = new DateTime($startHour);
            $interval = new DateInterval('PT' . $duration . 'M');
            $endTime = clone $startTime;
            $endTime->add($interval);

            return $endTime->format('H:i');
    }

}