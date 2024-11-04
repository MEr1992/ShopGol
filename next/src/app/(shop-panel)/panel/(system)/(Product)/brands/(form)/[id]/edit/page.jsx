"use client";
import Form from '@/app/(shop-panel)/panel/(system)/(Product)/brands/(form)/form';

export default function Edit({ params }){
    return(
        <Form id={params?.id}></Form>
    );
}