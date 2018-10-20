import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ModelModule } from '../model';

import { TaskCollectionService } from './services/task-collection.service';

@NgModule({
  imports: [
    CommonModule,
    ModelModule
  ]
})
export class RestModule {
  static forRoot() {
    return {
      ngModule: RestModule,
      providers: [
        TaskCollectionService
      ]
    };
  }
}
