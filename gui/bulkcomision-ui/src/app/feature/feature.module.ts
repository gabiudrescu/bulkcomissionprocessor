import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
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
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    ModelModule,
    RestModule,
    RouterModule.forChild(routes),
  ],
})
export class FeatureModule {
}
