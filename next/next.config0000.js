const nextConfig = {
    // reactStrictMode: true, 
    // distDir: '/../public_html/site/export',
    // output: "export",
    // useFileSystemPublicRoutes: false,
    // experimental: { esmExternals: true },
    webpack: (config) => {
        config.resolve.alias.canvas = false;

        return config;
    },
}
module.exports = nextConfig