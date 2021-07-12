import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { AdminLayoutRoutes } from './admin-layout.routing';


import { AdminComponent }           from '../../pages/admin/admin.component';
import { ReservationComponent }     from '../../pages/reservation/reservation.component';
import { HabitationComponent } from '../../pages/habitation/habitation.component';
import { ExtraServicesComponent } from '../../pages/extra-services/extra-services.component';
import { VendorsComponent } from '../../pages/vendors/vendors.component';
import { HistoryComponent } from '../../pages/history/history.component';
import { DashboardComponent }       from '../../pages/dashboard/dashboard.component';
import { UserComponent }            from '../../pages/user/user.component';
import { TableComponent }           from '../../pages/table/table.component';
import { TypographyComponent }      from '../../pages/typography/typography.component';
import { IconsComponent }           from '../../pages/icons/icons.component';
import { MapsComponent }            from '../../pages/maps/maps.component';
import { NotificationsComponent }   from '../../pages/notifications/notifications.component';
import { UpgradeComponent }         from '../../pages/upgrade/upgrade.component';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(AdminLayoutRoutes),
    FormsModule,
    NgbModule
  ],
  declarations: [
    AdminComponent,
    ReservationComponent,
    HabitationComponent,
    ExtraServicesComponent,
    VendorsComponent,
    HistoryComponent,
    DashboardComponent,
    UserComponent,
    TableComponent,
    UpgradeComponent,
    TypographyComponent,
    IconsComponent,
    MapsComponent,
    NotificationsComponent,
  ]
})

export class AdminLayoutModule {}
