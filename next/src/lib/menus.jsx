'use client'

export const getMenus = (user) => {
    const access = user?.role_id !== 2;

    const commonMenus = [
        { title: "dashboard", icon: "Home", href: "/dashboard" },
        { title: "products", icon: "Book", href: "/products" },
        { title: "brand", icon: "Calendar", href: "/brands" },
        { title: "category", icon: "List", href: "/categories" },
        { title: "line", icon: "Layers", href: "/lines" },
    ];

    const commonMenus2 = [
        { title: "edit_profile", icon: "User", href: "/editProfile" },
        { title: "change_password", icon: "Lock", href: "/changePassword" },
    ];

    return [...commonMenus,...commonMenus2];
};
