"use client";

import Form from '@/app/(shop-panel)/panel/(system)/(Users)/users/form';

export default function Edit({params}){
    
    return(
        <div>
            <Form title="personnel" titleFrame="personnels" id={params?.id} link="/personnels" roleFilter="0"></Form>
        </div>
    );
}