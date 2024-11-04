import RootLayout from "./RootLayout";

export async function generateMetadata({ params, searchParams }, parent) {
  
  return {
    author: 'Sanegar',
    title: "THE STEAM SQUAD – Digital Gateway",
    description: "Steam Squad is a transformative educational platform offering free, comprehensive STEAM courses designed to inspire and equip a diverse community for future success.",
    image: '/images/ogimage.jpg',
    keywords: "lms, learning system management, STEAM learning, educational platform, online learning",
    type: 'website',
    siteLanguage: 'fa_IR',
    siteUrl: 'https://sanegar.ir.org/fa',
    openGraph: {
      images: ['/some-specific-page-image.jpg'],
    },
    metadataBase: new URL('https://next-learn-dashboard.vercel.sh'),
  }
}

export default function({children}){
 return <RootLayout>{children}</RootLayout>
}