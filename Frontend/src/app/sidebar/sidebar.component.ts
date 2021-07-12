import { Component, OnInit } from '@angular/core';


export interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}

export const ROUTES: RouteInfo[] = [
    //{ path: '/admin',         title: 'Administrador',     icon:'nc-single-02', class: '' },
    { path: '/admin/reservacion',   title: 'Reservaciones',     icon:'nc-book-bookmark', class: '' },
    { path: '/admin/habitacion',    title: 'Habitaciones',      icon: 'nc-key-25',    class: '' },
    { path: '/admin/servicios',     title: 'Servicios Extra',   icon: 'nc-bell-55',    class: '' },
    { path: '/admin/proveedor',     title: 'Proveedores',       icon: 'nc-tile-56',    class: '' },
    { path: '/admin/historial',     title: 'Historial',         icon: 'nc-zoom-split',    class: '' },

    /*{ path: '/admin/dashboard',     title: 'Dashboard',         icon:'nc-bank',       class: '' },
    { path: '/admin/icons',         title: 'Icons',             icon:'nc-diamond',    class: '' },
    { path: '/admin/maps',          title: 'Maps',              icon:'nc-pin-3',      class: '' },
    { path: '/admin/notifications', title: 'Notifications',     icon:'nc-bell-55',    class: '' },
    { path: '/admin/user',          title: 'User Profile',      icon:'nc-single-02',  class: '' },
    { path: '/admin/table',         title: 'Table List',        icon:'nc-tile-56',    class: '' },
    { path: '/admin/typography',    title: 'Typography',        icon:'nc-caps-small', class: '' },
    { path: '/admin/upgrade',       title: 'Upgrade to PRO',    icon:'nc-spaceship',  class: 'active-pro' },*/
];

@Component({
    moduleId: module.id,
    selector: 'sidebar-cmp',
    templateUrl: 'sidebar.component.html',
})

export class SidebarComponent implements OnInit {
    public menuItems: RouteInfo[];
    ngOnInit() {
        this.menuItems = ROUTES.filter(menuItem => menuItem);
    }
}
