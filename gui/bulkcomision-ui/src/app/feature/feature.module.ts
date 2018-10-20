import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import { routes } from './feature.routes';
import { FeatureComponent } from './feature.component';
import { HomeComponent } from './home/home.component';

@NgModule({
  declarations: [
    FeatureComponent,
    HomeComponent
  ],
  imports: [
    RouterModule.forChild(routes),
  ],
})
export class FeatureModule {
}
