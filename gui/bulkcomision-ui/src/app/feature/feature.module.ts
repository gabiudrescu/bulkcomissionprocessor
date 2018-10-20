import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { ModelModule } from '../model';
import { RestModule } from '../rest';

import { routes } from './feature.routes';
import { FeatureComponent } from './feature.component';
import { HomeComponent } from './home/home.component';
import { TasksComponent } from './tasks/tasks.component';

@NgModule({
  declarations: [
    FeatureComponent,
    HomeComponent,
    TasksComponent
  ],
  imports: [
    ModelModule,
    RestModule,
    RouterModule.forChild(routes),
  ],
})
export class FeatureModule {
}
