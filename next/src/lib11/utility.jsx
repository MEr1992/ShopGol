'use client'

import { usePathname, useRouter } from "next/navigation";

export const utility = {
    addScriptFile: (name, path, callback=null)=>{
        var script = document.createElement( "script" )
        script.type = "text/javascript"; script.id = name; script.src = path;
        if(callback)
            if(script.readyState) {  // only required for IE <9
                script.onreadystatechange = function() {
                if ( script.readyState === "loaded" || script.readyState === "complete" ) {
                    script.onreadystatechange = null;
                    callback();
                }
                };
            } else {  //Others
                script.onload = function() {
                callback();
                };
            }
        
        typeof window != "undefined" && window?.document.getElementById(name) == undefined && window?.document.head.appendChild(script);
                
    },

    addCSSFile: (name, path)=>{
        var cssFile = typeof window != "undefined" ? window?.document.createElement('link'): "";
        cssFile.id = name;
        cssFile.setAttribute("rel", "stylesheet");
        cssFile.setAttribute("href", path);
        typeof window != "undefined" && window?.document.getElementById(name) == undefined && window?.document.head.appendChild(cssFile);
    },
    
    reloadPage: (router, pathname, id="")=>{
        let search = typeof window != "undefined" && window?.document.location.search.replace("?", "");
        let serachParams = search.split("&");
        let items = [], itemArr = [];

        serachParams.forEach((item)=>{
            itemArr = item.split("=");
            if(itemArr.length > 1)
                items[itemArr[0]] = itemArr[1];
        });
        items['pload'] = Math.random() * 1000;
        serachParams = [];
        Object.keys(items).forEach((key)=> serachParams.push(key+"="+items[key]));
        let newSearch = serachParams.join("&");
        let newUrl = pathname + "?" + newSearch+ (id!=""?"#"+id:"");
        router.push(newUrl);
    },

    getYearSemester: (group, Lang)=>{
        let result = ""
        if(parseInt(group) == 0){
            result = Lang("public.forAllYears");
        }else{
            let year = group.slice(0, 4)
            let semester = group.slice(4, 5)
            if(parseInt(semester) == 0){                
                result = Lang("public.forAllSemesters") + year;
            }else{
                result = year + "-" + semester;
            }
        }
        return <div style={{direction: "ltr"}}> { result} </div>
    },
    
    getGroupCode: (group, Lang)=>{
        let result = ""
        if(parseInt(group) == 0){
            result = Lang("public.forAllGroups");
        }else{
            let groupCode = group.slice(5, 7)
            if(groupCode == "00"){
                result = Lang("public.forAllGroups");
            }else{
                result = groupCode;
            }
        }
        return <span> { result} </span>
    },
}

export const useUtility = (router = null, pathname = null)=>{
    if(router == null) router = useRouter();
    if(pathname == null) pathname = usePathname();
    
    return {
        addCSSFile: utility.addCSSFile,
        addScriptFile: utility.addScriptFile,
        reload: (id = "")=>utility.reloadPage(router, pathname, id),
        getYearSemester: utility.getYearSemester,
        getGroupCode: utility.getGroupCode,
    }
}
