"use client";
import { useLang } from "@/lib/lang";
import { useConfig } from "@/lib/config";
import { Grid,Frame,useData,FeatherIcon,Pic } from "@/Theme/Midone/Utils";

export default function List(){
    const { Lang,local } = useLang();
    const { laraAdmin,nextAdmin } = useConfig();
    const { destroy } = useData();
    const formUrl = "/products";

    let info = {
        insertLink: nextAdmin+formUrl+"/new",
        url: laraAdmin+formUrl,
        columns: [
            {label: "", jsx:(item)=>
                <Pic src={mediaPath+"/product/"+item?.image} defaultImg={`${mediaPath}/public/default/avatar.png`} key={"img"+item?.image} classImg="user-avatar rounded-full" />},
            {label: "name", field: "name"},
            {label: "category", field: "category"},
            {label: "line", field: "line"},
            {label: "brand", field: "brand"},
            {label: "status",  jsx: (item)=><span className={item.active_status?.color}>{item.active_status?.["title_"+local]}</span>},
            {label: "", sort:false, width:"110px", jsx:(item)=>
                <>
                    <div className='flex justify-center '>
                        <FeatherIcon name="Edit" url={nextAdmin+formUrl+"/"+item.id+"/edit"} tooltip={Lang('public.edit')} />
                        <FeatherIcon name="XOctagon" tooltip={Lang('public.delete')} color="darkred" onClick={()=>destroy(laraAdmin+formUrl+"/"+item.id)} />
                    </div>
                </>
            },
        ],
    }

    return(
        <Frame>
            <div className="intro-y col-span-12">
                <Grid {...info} key={"table key"} />
            </div>
        </Frame>
    );
}