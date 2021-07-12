import { Routes } from '@angular/router';

import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';
import { ClientLayoutComponent } from './layouts/client-layout/client-layout.component';
import { VendorLayoutComponent } from './layouts/vendor-layout/vendor-layout.component';
import { ReservationComponent } from './layouts/client-layout/reservation/reservation.component';

export const AppRoutes: Routes = [
  {
    path: '',
    component: ClientLayoutComponent,
    pathMatch: 'full',
  }, {
    path: 'admin',
    component: AdminLayoutComponent,
    children: [
        {
      path: '',
      loadChildren: './layouts/admin-layout/admin-layout.module#AdminLayoutModule'
  }]},
  {
    path: 'proveedor',
    component: VendorLayoutComponent
    },
    {
      path: 'reservacion',
      component: ReservationComponent
      },
  {
    path: '**',
    redirectTo: ''
  }
]
