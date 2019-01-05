<template>
  <form action="#" v-on:submit.prevent="storeTask()" method="post">
    <div class="form-group">
      <input type="text" class="form-control" v-model="description" placeholder="Add new task">
    </div>
    <div class="form-group my-0">
      <button class="btn btn-primary btn-block" :disabled="this.description.length < 1">Add task</button>
    </div>
  </form>
</template>

<script>
  import api from '../api'

  export default {
    name: "AddTaskForm",

    props: {
      projectId: {
        default: null
      }
    },

    data() {
      return {
        description: ''
      }
    },

    methods: {
      storeTask() {
        if (this.description.length > 0) {
          axios.post(api.storeTask(this.projectId), {
            description: this.description
          })
            .then(() => {
              this.$eventHub.$emit('task-stored')
              this.description = ''
              this.$notify({
                group: 'app',
                type: 'success',
                text: 'New task successfully created'
              });
            })
        }
      }
    }
  }
</script>
