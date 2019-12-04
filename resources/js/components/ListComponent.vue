<template>
  <div id="todo-list" class="container py-5">
    <div class="mb-5 d-flex justify-content-center align-items-center">
      <img src="images/laravel.svg" width="400" class="img-laravel" />
      <span class="plus-images mx-4">+</span>
      <img src="/images/vuejs.png" width="110" class="img-vue" />
    </div>

    <div class="row">
      <div class="col-md-6 mx-auto">
        <h1 class="text-center">Tasks App</h1>

        <form v-on:submit.prevent="addNewTask" class="mb-5">
          <label for="tasknameinput">Task Name</label>

          <input v-model="user_id" type="hidden" />

          <input
            v-model="taskname"
            type="text"
            id="tasknameinput"
            class="form-control"
            placeholder="Add New Task"
          />
          <button
            v-if="this.isEdit == false"
            type="submit"
            class="btn btn-success btn-block mt-3"
            :disabled="disabledSubmit"
          >Submit</button>
          <button
            v-else
            type="button"
            v-on:click="updateTask()"
            class="btn btn-primary btn-block mt-3"
          >Update</button>
        </form>

        <table class="table">
          <tr v-for="(todo) in todos" v-bind:key="todo.id" v-bind:title="todo.title">
            <td class="text-left">{{todo.title}}</td>
            <td class="text-right d-flex">
              <button
                v-on:click="editTask(todo.title, todo.id)"
                class="h-100 col-6 btn-xs btn-info color-white mr-2"
              >Edit</button>
              <button v-on:click="deleteTask(todo.id)" class="col-6 btn-xs btn-danger px-1">Delete</button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    user: {
      type: Number,
      required: true
    },
    token: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      todos: [],
      id: "",
      taskname: "",
      isEdit: false,
      user_id: this.user,
      token: this.token,
    };
  },
  mounted() {
    this.getTasks();
    console.log("apiUrl = " + this.apiGet);
    console.log("apiAll = " + this.apiAll);
  },
  computed: {
    apiGet() {
      return "/api/tasks";
    },
    apiAll() {
      return "/api/task";
    },
    disabledSubmit() {
      return !(this.taskname.length > 3);
    },
    token_param(){
      return "?api_token="+this.token;
    }
  },
  methods: {
    getTasks() {
      const auth = {
        Authentication: this.user_id
      }

      axios({
        method: "GET",
        url: this.apiGet+this.token_param,
        headers: auth
      }).then(
        result => {
          console.log(result.data);
          this.todos = result.data;
        },
        error => {
          console.error(error);
        }
      );
    },
    addNewTask() {
      axios
        .post(this.apiAll, {
          title: this.taskname,
          user_id: this.user_id,
          api_token: this.token
        })
        .then(res => {
          this.taskname = "";
          this.getTasks();
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });
    },
    editTask(title, id) {
      this.id = id;
      this.taskname = title;
      this.isEdit = true;
    },
    updateTask() {
      axios
        .put(`${this.apiAll}/${this.id}`, {
          title: this.taskname,
          api_token: this.token
        })
        .then(res => {
          this.taskname = "";
          this.isEdit = false;
          this.getTasks();
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });
    },
    deleteTask(id) {
      axios
        .delete(`${this.apiAll}/${id}${this.token_param}`)
        .then(res => {
          this.taskname = "";
          this.getTasks();
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>