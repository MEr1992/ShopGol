'use client'

import { useLang } from "@/lib/lang";
import { loadingIcons } from "@/lib/icons";

export const Loading =  ({ className = "", displayText = undefined, displayIcon = loadingIcons.bars }) => {
    const {Lang} = useLang();
    if(displayText == undefined) displayText = Lang("public.grid_loading")+".....";

    return(
        <div className={"col-span-6 sm:col-span-3 xl:col-span-2 flex flex-col justify-end items-center "+className}>
            {displayIcon}
            <div className="text-center text-xs mt-2">{displayText}</div>
        </div>
    );
    
    // صوت : audio
    // توپ مثلثی : ballTriangle
    // خطی : bars
    // دایره : circles
    // گرید : grid
    // قلب : hearts
    // دایره : oval
    // پاف : puff
    // رینگ : rings
    // دایره چرخان : spinningCircles
    // چرخش مار : tailSpin
    // سه نقطه : threeDots
}