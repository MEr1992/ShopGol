"use client";
import { useEffect } from "react";
import { useLang } from "@/lib/lang";
import { useConfig } from "@/lib/config";
import { useRouter } from 'next/navigation';
import { useData,useFormRefs,Input,Button,ButtonContainer,CheckBox,Box } from "@/Theme/Midone/Forms";
import { Dropzone } from "@/Theme/Midone/Forms/Dropzone";

export default function Form({ id }){
    const { Lang,local } = useLang();
    const { laraAdmin } = useConfig();
    let { save,get } = useData();
    let component = useFormRefs();
    const router = useRouter();
    const formUrl = "/brands"; 
    let url = laraAdmin+formUrl, method = "new";
    if(id != 0 && id != undefined) url = laraAdmin+formUrl+"/"+id, method = "edit";
    
    let uploadUrl = laraAdmin+"/upload/.-media-brand";
    let deleteUrl = laraAdmin+"/deleteFile/.-media-brand";
    let uploadDir = 'media/brand/';
    
    useEffect(()=>{
        if(id != 0) get(url, component, "info");
    }, [id]);

    const saveItem = ()=>save(url, component, method, formUrl);
    const back = ()=>router.back();

    return(
        <>
            <Box>     
                <Input label="name" refItem={[component, "name_"+local]} required="true" />
                <Dropzone refItem={[component, "logo"]} uploadUrl={uploadUrl} deleteUrl={deleteUrl+"/"} uploadDir={uploadDir} required="true" />
                <CheckBox label="status" name={Lang('public.active')} refItem={[component, "status_id"]} />        
            </Box>
            <ButtonContainer>
                <Button label="save" onClick={saveItem} />
                <Button label="back" onClick={back} />
            </ButtonContainer>        
        </>
    );
}