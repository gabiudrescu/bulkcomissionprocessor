import { TaskStatus } from './status.model';

export interface TaskCollection {
  id: number;
  progress: number;
  status: TaskStatus;
}
