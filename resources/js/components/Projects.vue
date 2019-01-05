<template>
  <div class="project-list">
    <div v-for="project in projects" class="project-list-item">
      <div class="progress" v-bind:style="{width: (project.progress)*100 + '%'}"></div>
      <div class="detail">
        <div class="float-right">
          <project-progress
            v-bind:projectId="project.id"
            v-bind:showPercentage="false"></project-progress>
        </div>
        <a :href="'./project/' + project.id">
          {{ project.name }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
  import api from '../api';

  export default {
    name: "Projects",

    created() {
      this.getProjects();
    },

    data: function() {
      return {
        projects: []
      }
    },

    methods: {
      getProjects: function() {
        axios.get(api.getProjects)
          .then(response => {
            this.projects = response.data.data
          })
      }
    }
  }
</script>

