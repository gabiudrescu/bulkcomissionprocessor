import {Component, OnInit} from '@angular/core';
import {TaskCollectionService} from '../../rest';
import {TaskCollection} from '../../model';

@Component({
  templateUrl: 'tasks.component.html'
})
export class TasksComponent implements OnInit {

  tasksCollections: TaskCollection[];

  constructor(private taskCollectionService: TaskCollectionService) {
  }

  ngOnInit(): void {
    this.taskCollectionService.getTasksCollections().subscribe(res => {
      this.tasksCollections = res;
      console.log(this.tasksCollections);
    });
  }
}
