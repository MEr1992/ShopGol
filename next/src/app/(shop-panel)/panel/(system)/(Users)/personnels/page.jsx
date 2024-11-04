"use client";
import List from '@/app/(shop-panel)/panel/(system)/(Users)/users/page';

export default function Personnels(){
    return(
        <div>
            <List view={true} title="personnels" link="/personnels" displayRole={true}></List>
        </div>
    );
}