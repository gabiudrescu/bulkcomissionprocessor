import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { TaskCollection } from '../../model';

@Injectable()
export class TaskCollectionService {

  path = 'localhost:3000/tasks-collections';

  constructor(private http: HttpClient) { }

  getTasksCollections() {
    return this.http.get<TaskCollection[]>(this.path);
  }
}
