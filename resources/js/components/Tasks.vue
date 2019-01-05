<template>
  <table class="table my-0">
    <tr v-for="task in tasks" class="task-item">
      <td>
        <div class="float-right task-action ml-1">
          <a href="javascript:" v-if="task.is_completed" @click="markIncomplete(task.id)">incomplete</a>
          <a href="javascript:" class="text-success" v-else @click="markCompleted(task.id)">completed</a>

          &middot;
          <a href="javascript:" @click="taskSelected(task)">edit</a>

          &middot;
          <a href="javascript:" class="text-danger" @click="deleteTask(task.id)">delete</a>
        </div>

        <div v-bind:class="{ 'is-completed': task.is_completed }">
          {{ task.description }}
        </div>
      </td>
    </tr>
  </table>
</template>

<script>
  import api from '../api'

  export default {
    name: "Tasks",

    created() {
      this.getTasks()

      let events
      events = [
        'task-stored',
        'task-updated',
        'task-deleted',
        'task-completed',
        'task-incomplete'
      ];

      this.$eventHub.$on(events, () => {
        this.getTasks()
      })
    },

    props: {
      'projectId': {
        'default': null
      }
    },

    data: function() {
      return {
        tasks: []
      }
    },

    methods: {
      getTasks: function() {
        axios.get(api.getTasks(this.projectId))
          .then(response => {
            this.tasks = response.data.data
          })
      },

      deleteTask: function(task) {
        axios.delete(api.showTask(task))
          .then(() => {
            this.$eventHub.$emit('task-deleted')
            this.$notify({
              group: 'app',
              type: 'success',
              text: 'Task successfully deleted'
            });
          })
      },

      markCompleted: function(task) {
        axios.put(api.markTaskCompleted(task))
          .then(() => {
            this.$eventHub.$emit('task-completed')
            this.$notify({
              group: 'app',
              type: 'success',
              text: 'Task marked as completed'
            });
          })
      },

      markIncomplete: function(task) {
        axios.put(api.markTaskIncomplete(task))
          .then(() => {
            this.$eventHub.$emit('task-incomplete')
            this.$notify({
              group: 'app',
              type: 'success',
              text: 'Task marked as incomplete'
            });
          })
      },

      taskSelected: function(task) {
        this.$eventHub.$emit('task-selected', task)
      }
    }
  }
</script>
