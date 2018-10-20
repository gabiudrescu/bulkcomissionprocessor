import { FeatureComponent } from './feature.component';
import { HomeComponent } from './home/home.component';

export const routes = [
  { path: '', children: [
    { path: '', component: FeatureComponent, children: [
        { path: '', component: HomeComponent },
      ]}
  ]}
];
