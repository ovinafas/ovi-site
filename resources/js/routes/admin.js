import Dashboard from "../views/Admin/Dashboard";
import CategoriesIndex from "../views/Admin/Categories/CategoriesIndex";
import CategoriesCreate from "../views/Admin/Categories/CategoriesCreate";
import CategoriesEdit from "../views/Admin/Categories/CategoriesEdit";

import TagsIndex from "../views/Admin/Tags/TagsIndex";
import TagsCreate from "../views/Admin/Tags/TagsCreate";

import UsersIndex from "../views/Admin/Users/UsersIndex";



import PostsIndex from "../views/Admin/Posts/PostsIndex";
import PostsCreate from "../views/Admin/Posts/PostsCreate";

const routes = [
    {
        path: "/admin",
        component: Dashboard,
        name: "admin.dashboard",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/categories",
        component: CategoriesIndex,
        name: "admin.categories.index",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/categories/create",
        component: CategoriesCreate,
        name: "admin.categories.create",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/categories/:category/edit",
        component: CategoriesEdit,
        name: "admin.categories.edit",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/tags",
        component: TagsIndex,
        name: "admin.tags.index",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/tags/create",
        component: TagsCreate,
        name: "admin.tags.create",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/users",
        component: UsersIndex,
        name: "admin.users.index",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/posts",
        component: PostsIndex,
        name: "admin.posts.index",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/posts/create",
        component: PostsCreate,
        name: "admin.posts.create",
        meta: {
            layout: "admin-layout"
        }
    },

];

export default routes;
