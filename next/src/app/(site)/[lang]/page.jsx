"use client"
import { useEffect, useState } from "react";
import {Categories, Courses, Hero, WorkProcess , Event } from "@/Theme/Site";
import { useData } from "@/Theme/Midone/Utils/Data";

export default function Page({ params }) {

    const formUrl = "" ; 
    const local = params?.lang ? params?.lang : 'en' ;
    let {getNeedles} = useData();
    let [needles, setNeedles] = useState();
   
    useEffect(() => {
        getNeedles(local+formUrl, setNeedles);
    }, []);
    // console.log("reload!!");
    return <>
        <Hero data={needles?.hero} text={needles?.siteText?.[0]} local={local} />
        {/* <Awards data={needles?.awards} local={local} /> */}
        <Courses data={needles?.course} text={needles?.siteText?.[1]} local={local} />
        <Categories data={needles?.category} text={needles?.siteText?.[2]} local={local} />
        <WorkProcess data={needles?.work} text={needles?.siteText} local={local} />
        {/* <StudentsReviews data={needles?.students} local={local} /> */}
        {/* <Article data={needles?.blog} local={local} text={needles?.siteText?.[12]} /> */}
        <Event data={needles?.event} userEvents={needles?.userEvents} local={local} text={needles?.siteText?.[13]} />
    </>
}