import { useConfig } from "@/lib/config";
import Link from "next/link";
import { useEffect, useState } from "react";
import { Tools, useData } from "@/Theme/Midone";

export const Footer = ({params}) => {
	// console.log(params);
	const {assetsPath } = useConfig();
	let { getNeedles } = useData();
    let [needles, setNeedles] = useState({});
    const formUrl = "/footer";
    const local = params?.lang ?  params?.lang : "en" ;

	useEffect(() => {
		getNeedles(local + formUrl, setNeedles);
    }, []);


    return <>
       <footer className="dark-footer skin-dark-footer style-2">
				<div className="footer-middle">
					<div className="container">
						<div className="row">
							
							<div className="col-lg-5 col-md-5">
								<div className="footer_widget">
									<img src={assetsPath+"/img/logo.png"} className="img-footer small mb-2" alt="" />
									<h4 className="extream mb-3">THE STEAM SQUAD</h4>
									<ul className="social_footer">
										{Tools.getArray(needles?.socials).map((social,index)=>{
											return <li key={index}><a target="_blanck" href={`http://${social?.link}`}><i className={social?.icon}></i></a></li>
										})}
									
									</ul>
									
								</div>
							</div>
							
							<div className="col-lg-6 col-md-7 ml-auto">
								<div className="row">
								
									<div className="col-lg-4 col-md-4">
										<div className="footer_widget">
											<h4 className="widget_title">Course Categories</h4>
											<ul className="footer-menu">
												{Tools.getArray(needles?.category).map((cat,index)=>{
													return <li key={index}><Link href={"/en/courses?category="+cat?.id+"&pload="+Math.random()}>{cat?.['title_'+local]}</Link></li>
												})}
											</ul>
										</div>
									</div>
											
									<div className="col-lg-4 col-md-4">
										<div className="footer_widget">
											<h4 className="widget_title">Education Level</h4>
											<ul className="footer-menu">
												{Tools.getArray(needles?.level).map((le,index)=>{
													return <li key={index}><Link href={"/en/courses?level="+le?.id}>{le?.['title_'+local]}</Link></li>
												})}
												
											</ul>
										</div>
									</div>
							
									<div className="col-lg-4 col-md-4">
										<div className="footer_widget">
											<h4 className="widget_title">academy</h4>
											<ul className="footer-menu">
												<li key='1'><Link href="/en">Home</Link></li>
												<li key='2'><Link href="/en/courses">Courses</Link></li>
												<li key='3'><Link href="/en/events">Events</Link></li>
												<li key='4'><Link href="/en/mentorship">Mentorship</Link></li>												
												<li key='5'><Link href="https://forum.demo.steam-squad.org/index.php">Forum</Link></li>
												<li key='6'><Link href="/en/blogs">Blog</Link></li>
												<li key='7'><Link href="/en/about-us">About Us</Link></li>
												<li key='8'><Link href="/en/contact-us">Contact Us</Link></li>
											</ul>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div className="footer-bottom">
					<div className="container">
						<div className="row align-items-center">
							<div className="col-lg-12 col-md-12 text-center">
								<p className="mb-0">© 2024 STEAM SQUAD. All rights reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
    </>
}