'use client'

import * as Icon from 'react-feather';
import Link from 'next/link';
import { useEffect } from 'react';


export const FeatherIcon = ({name, onClick, url, iconClassName,spanWrapperClass, tooltip, color, size, access = true}) => {
    const ICONname = Icon[name];
    const options = {
        color: color, 
        size: size,
        className: (iconClassName?iconClassName:''),
        // className: 'mx-1 '+(iconClassName?iconClassName:''),
    }

    // change icon size in mobile if icon has mobile-re... className
    useEffect(() => {
        setTimeout(() => {
            $('.mobile-resize-icon').attr('width', '18')
            $('.mobile-resize-icon').attr('height', '18')
        }, 100);
    })

    if(!access) return <></>;

    const ICON = <ICONname {...options} />
    let IconWrapper = '';

    if(url){
        IconWrapper = <Link className={spanWrapperClass} href={url} > {ICON} </Link>;
    }else{
        IconWrapper = <span className={spanWrapperClass} onClick={onClick} style={{'cursor': 'pointer' }}> {ICON} </span>;
    }
    
    if(tooltip){
        return <>
            <span className='simple-tooltip mr-1'> {IconWrapper} 
                <span className='tooltiptext'>{tooltip}</span>
            </span>
        </>
    }else{
        return <> {IconWrapper} </>
    }
};
