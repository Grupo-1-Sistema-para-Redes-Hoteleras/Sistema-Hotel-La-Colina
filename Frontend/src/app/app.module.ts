import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { ToastrModule } from "ngx-toastr";

import { SidebarModule } from './sidebar/sidebar.module';
import { FooterModule } from './shared/footer/footer.module';
import { NavbarModule} from './shared/navbar/navbar.module';
import { FixedPluginModule} from './shared/fixedplugin/fixedplugin.module';

import { AppComponent } from './app.component';
import { AppRoutes } from './app.routing';

import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';
import { VendorLayoutComponent } from './layouts/vendor-layout/vendor-layout.component';
import { ConfirmComponent } from './layouts/vendor-layout/confirm/confirm.component';
import { FormVendorComponent } from './layouts/vendor-layout/form-vendor/form-vendor.component';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { ClientLayoutModule } from './layouts/client-layout/client-layout.module';



@NgModule({
  declarations: [
    AppComponent,
    AdminLayoutComponent,    
    VendorLayoutComponent,
    ConfirmComponent,
    FormVendorComponent,
   
    
    
  ],
  imports: [
    BrowserAnimationsModule,
    RouterModule.forRoot(AppRoutes,{
      useHash: true
    }),
    SidebarModule,
    NavbarModule,    
    ToastrModule.forRoot(),
    FooterModule,
    FixedPluginModule,
    FormsModule,    
    BrowserModule,
    ClientLayoutModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
