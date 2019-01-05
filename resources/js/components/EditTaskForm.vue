<template>
  <b-modal ref="editModal" hide-footer title="Edit Task">
    <form action="#" v-on:submit.prevent="updateTask()" method="post">
      <div class="form-group">
        <input type="text" class="form-control" v-model="description">
      </div>
      <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" :disabled="this.description.length < 1">
          Save changes
        </button>
      </div>
    </form>
  </b-modal>
</template>
<script>
  import api from '../api'

  export default {
    name: "EditTaskForm",

    created() {
      this.$eventHub.$on('task-selected', (task) => {
        this.task = task
        this.description = task.description
        this.showModal()
      })

      this.$eventHub.$on('task-updated', () => {
        this.hideModal()
      })
    },

    data() {
      return {
        description: '',
        task: null
      }
    },

    methods: {
      updateTask: function() {
        axios.put(api.showTask(this.task.id), {
          description: this.description
        })
          .then(() => {
            this.$eventHub.$emit('task-updated')
            this.description = ''
            this.$notify({
              group: 'app',
              type: 'success',
              text: 'Task successfully updated'
            });
          })
      },

      showModal() {
        this.$refs.editModal.show()
      },
      hideModal() {
        this.$refs.editModal.hide()
      }
    }
  }
</script>
