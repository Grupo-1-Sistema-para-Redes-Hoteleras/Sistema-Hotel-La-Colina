import { Routes } from '@angular/router';

import { AdminComponent } from '../../pages/admin/admin.component';
import { ReservationComponent } from '../../pages/reservation/reservation.component';
import { HabitationComponent } from '../../pages/habitation/habitation.component';
import { ExtraServicesComponent } from '../../pages/extra-services/extra-services.component';
import { VendorsComponent } from '../../pages/vendors/vendors.component';
import { HistoryComponent } from '../../pages/history/history.component';
import { DashboardComponent } from '../../pages/dashboard/dashboard.component';
import { UserComponent } from '../../pages/user/user.component';
import { TableComponent } from '../../pages/table/table.component';
import { TypographyComponent } from '../../pages/typography/typography.component';
import { IconsComponent } from '../../pages/icons/icons.component';
import { MapsComponent } from '../../pages/maps/maps.component';
import { NotificationsComponent } from '../../pages/notifications/notifications.component';
import { UpgradeComponent } from '../../pages/upgrade/upgrade.component';

export const AdminLayoutRoutes: Routes = [
    { path: 'admin',          component: AdminComponent },
    { path: 'reservacion',    component: ReservationComponent },
    { path: 'habitacion',     component: HabitationComponent },
    { path: 'servicios',      component: ExtraServicesComponent },
    { path: 'proveedor',      component: VendorsComponent },
    { path: 'historial',      component: HistoryComponent },
    
    { path: 'dashboard',      component: DashboardComponent },
    { path: 'user',           component: UserComponent },
    { path: 'table',          component: TableComponent },
    { path: 'typography',     component: TypographyComponent },
    { path: 'icons',          component: IconsComponent },
    { path: 'maps',           component: MapsComponent },
    { path: 'notifications',  component: NotificationsComponent },
    { path: 'upgrade',        component: UpgradeComponent }
];
