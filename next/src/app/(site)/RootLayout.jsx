"use client"

import dynamic from 'next/dynamic';
import Script from 'next/script'
import 'react-toastify/dist/ReactToastify.css';
import { ToastContainer } from 'react-toastify';
import { useConfig } from "@/lib/config";
const StoreProvider = dynamic(() => import("@/redux/StoreProvider"))
const store = dynamic(() => import("@/redux/store"))
const App = dynamic(() => import("@/app/(shop-panel)/App").then((module) => module.App));
const Loading = dynamic(() => import('./Loading'))
import { config } from "@/lib";

// import { utility } from "@/lib";
import { Footer, Header } from '@/Theme/Site';
import { usePathname } from 'next/navigation';

export default function RootLayout({ children }) {
	const pathname = usePathname();
	const { assetsPath } = useConfig();
	// utility.addCSSFile('style', );

	// const HeaderComp = (pathname == "/en" || pathname == "/fa" || pathname == "/ar") ? Header : HeaderLight;
	const HeaderComp = Header;

	return (<>
		<html lang="en">
			<head>
				{/* <link rel="stylesheet" href={assetsPath + '/css/styles.css'} /> */}
			</head>
			<body>
				<StoreProvider store={store}>
					<App load={() => <Loading />} key={Math.random()}>
						<HeaderComp />
						<div id="main-wrapper">
							{children}
						</div>
						{/* <CallToAction /> */}
						<Footer lang={pathname} />
					</App>
				</StoreProvider>
				<Script id='jquery.min.js' src={assetsPath + '/js/jquery.min.js'} strategy='beforeInteractive' />
				<Script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
					integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
					crossorigin="anonymous" strategy='afterInteractive' />
				
				<ToastContainer />
			</body>
		</html>
	</>)
}