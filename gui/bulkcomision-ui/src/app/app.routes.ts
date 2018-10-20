import { Routes } from '@angular/router';
import { Page404Component } from './page404/page-404.component';

export const ROUTES: Routes = [
  { path: '', loadChildren: './feature#FeatureModule'},
  { path: '**',    component: Page404Component },
];
