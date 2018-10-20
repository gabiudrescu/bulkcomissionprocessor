import { FeatureComponent } from './feature.component';
import { HomeComponent } from './home/home.component';
import { TasksComponent } from './tasks/tasks.component';

export const routes = [
  { path: '', children: [
    { path: '', component: FeatureComponent, children: [
        { path: '', component: HomeComponent },
        { path: 'tasks', component: TasksComponent },
      ]}
  ]}
];
