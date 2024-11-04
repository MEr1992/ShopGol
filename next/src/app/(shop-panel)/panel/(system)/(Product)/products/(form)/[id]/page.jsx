"use client";
import { useEffect } from "react";
import { useLang } from "@/lib/lang";
import { useConfig } from "@/lib/config";
import { Box,useData,useFormRefs } from "@/Theme/Midone";

export default function View({params}){
    const { Lang } = useLang();
    const { laraAdmin } = useConfig();
    let { get } = useData();
    let component = useFormRefs();
    const formUrl = "/product-brands";
    let url = laraAdmin+formUrl+"/"+id, id = params?.id;
    
    useEffect(()=>{
        get(url, component, "info");
    }, [id]);

    let data = component?.state?.info;

    return(
        <>
            <Box>
                {data.id}
            </Box>
        </>
    );
}