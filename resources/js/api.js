const api = {
  getProjects: '/data/projects',
  getProjectProgress: (project) => '/data/project/' + project + '/progress',
  getTasks: (project) => '/data/tasks/' + project,
  storeTask: (project) => '/data/tasks/' + project,
  showTask: (task) => '/data/task/' + task,
  markTaskCompleted: (task) => '/data/task/' + task + '/completed',
  markTaskIncomplete: (task) => '/data/task/' + task + '/incomplete',
};

export default api;
