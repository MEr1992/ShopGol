"use client";
import { useLang } from "@/lib/lang";
import { useConfig } from "@/lib/config";
import { useData } from "@/Theme/Midone/Utils/Data";
import { Grid, Frame, FeatherIcon, Pic } from "@/Theme/Midone/Utils";

export default function List({link="/users", displayRole=true, view=false,title="users"}){
    const {Lang, local} = useLang();
    const {mediaPath,laraAdmin,nextAdmin} = useConfig();
    const {destroy} = useData();
    const formUrl = nextAdmin+link;

    let info = {
        insertLink: formUrl+"/new",
        url: laraAdmin+link,
        columns: [
            // {label: "", jsx:(item)=><img className="user-avatar rounded-full" src={mediaPath+"/users/"+item?.photo} alt="user" />},
            {label: "", jsx:(item)=>
                <Pic src={mediaPath+"/users/"+item?.photo} defaultImg={`${mediaPath}/public/default/avatar.png`} classImg="user-avatar rounded-full" />},
            {label: "name", field: "firstname"},
            {label: "lname", field: "lastname"},
            {label: "mobile", field: "mobile"},
            {label: "email", field: "email"},
            (displayRole)? {label: "role", sort:false, field: "role.title_"+local} : "",
            {label: "gender", sort:false, field: "gender.title_"+local},
            {label: "status", jsx: (item)=><span className={"text-"+item?.active_status?.color}>{item?.active_status?.["title_"+local]}</span>},
            {label: "", sort:false, 
                jsx:(item)=><>
                    <div className='flex justify-center '>
                        <FeatherIcon name="Edit" url={formUrl+"/"+item?.id+"/edit"} tooltip={Lang('public.edit')} />
                        {(view)? <FeatherIcon name="Eye" url={formUrl+"/"+item?.id} tooltip={Lang('public.view')} />:""}
                        <FeatherIcon name="XOctagon" tooltip={Lang('public.delete')} color="darkred" onClick={()=>destroy(laraAdmin+link+"/"+item?.id)} />
                    </div>
                </>
            }, 
        ],
    }

    return(
        <>
            <Frame title={Lang(["public."+title])}>
                <div className="intro-y col-span-12">
                    <Grid {...info} />
                </div>
            </Frame>
        </>
    );
}