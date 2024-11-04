'use client'

import { useState, useEffect } from 'react';
import { FeatherIcon } from "@/Theme/Midone/Utils/FeatherIcon";
import { useLang } from '@/lib';

export const Repeat = ({ child, parent, needles, count_data = 1, classNameComp, other, displayClose = true, displayPlus = true }) => {
    let [state, setState] = useState({
        count: 1,
        deleted: [],
    });
    const { Lang } = useLang();

    useEffect(() => {
        setState({ ...state, count: count_data });
    }, [count_data]);

    const add = () => {
        let { count } = state;
        count++;
        setState({ ...state, count: count });
    }

    const remove = (key) => {
        let { deleted } = state;
        deleted.push(key);
        setState({ ...state, deleted });
    }

    const closeIcon = (key) => (
        <FeatherIcon name="XOctagon" color="darkred" onClick={() => remove(key)} />
    );

    const addIcon = () => (
        <FeatherIcon name="PlusSquare" onClick={add} />
    );

    let Comp = child;

    return <>
        {
            Array(state.count).fill(0).map((i, key) => {
                if (state.deleted.indexOf(key) === -1)
                    return <Comp
                        key={key + other?.toString()}
                        index={key}
                        parent={parent}
                        needles={needles}
                        className={"col-span-11 " + classNameComp}
                        addIcon={displayPlus && addIcon()}
                        closeIcon={displayClose && closeIcon(key)}
                        {...other}
                    />
            })
        }
    </>
}
