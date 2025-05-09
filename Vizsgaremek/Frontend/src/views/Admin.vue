<template>
  <div class="container w-100 mt-2">
    <div class="table-responsive">
      <table
        class="table table-bordered table-hover table-striped shadow-sm rounded"
      >
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Email</th>
            <th>Műveletek</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in items"
            :key="item.id"
            @click="onClickTr(item.id)"
            :class="{ active: item.id === selectedRowId }"
          >
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.email }}</td>
            <td class="text-center">
              <OperationsCrud
                @onClickDeleteButton="onClickDeleteButton"
                @onClickUpdate="onClickUpdate"
                :data="item"
              />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <Modal
      :title="title"
      :yes="yes"
      :no="no"
      :size="size"
      @yesEvent="yesEventHandler"
    >
      <div v-if="state == 'Delete'">
        {{ messageYesNo }}
      </div>
      <ItemForm
        v-if="state == 'Update'"
        :itemForm="item"
        @saveItem="saveItemHandler"
      />
    </Modal>
  </div>
</template>
 
<script>
import { useAuthStore } from "@/stores/useAuthStore.js";
import { BASE_URL } from "@/helpers/baseUrls";
import OperationsCrud from "@/components/OperationsCrud.vue";
import ItemForm from "@/components/UserForm.vue";
import axios from "axios";
import * as bootstrap from "bootstrap";
 
class Item {
  constructor(
    id = null,
    user = null,
    email = null,
    role_id = null
  ) {
    this.id = id;
    this.user = user;
    this.email = email;
    this.roleId = role_id;
  }
}
 
export default {
  components: { ItemForm, OperationsCrud },
  data() {
    return {
      urlApi: `${BASE_URL}/users`,
      stateAuth: useAuthStore(),
      selectedRowId: null,
      modal: null,
      items: [],
      state: "Read",
      title: null,
      yes: null,
      no: null,
      size: null,
      item: new Item(),
    };
  },
  mounted() {
    this.getCollections();
    this.modal = new bootstrap.Modal("#modal", {
      keyboard: false,
    });
  },
  methods: {
    async getCollections() {
      try {
        const response = await axios.get(this.urlApi, {
          headers: { Authorization: `Bearer ${this.stateAuth.token}` },
        });
        console.log(response.data.data);
 
        this.items = response.data.data;
      } catch (error) {
        this.errorMessages = "Szerver hiba";
      }
    },
    async deleteItemById() {
      this.loading = true;
      const id = this.selectedRowId;
      const token = this.stateAuth.token;
 
      const url = `${this.urlApi}/${id}`;
      const headers = {
        Accept: "application/json",
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`,
      };
 
      try {
        const response = await axios.delete(url, { headers });
        this.getCollections();
      } catch (error) {
        toast.error("Szerver hiba");
      }
      this.loading = false;
    },
    async updateItem() {
      const id = this.selectedRowId;
      console.log(id);
 
      const url = `${this.urlApi}/${id}`;
      const headers = {
        Accept: "application/json",
        "Content-Type": "application/json",
        Authorization: `Bearer ${this.stateAuth.token}`,
      };
 
      console.log(url, headers);
 
      // Módosítás
      const data = {
        name: this.item.name,
        email: this.item.email,
        role_id: this.item.roleId,
      };
      try {
        const response = await axios.patch(url, data, { headers });
        if (this.item.name !== this.stateAuth.name) {
          this.stateAuth.user = this.item.name;
        }
        
        this.getCollections();
      } catch (error) {
        toast.error("Szerver hiba");
      }
      this.state = "Read";
    },
    onClickDeleteButton(item) {
      this.state = "Delete";
      this.title = "Törlés";
      this.messageYesNo = `Valóban törölni akarod a(z) ${item.name} nevű fiókot?`;
      this.yes = "Igen";
      this.no = "Nem";
      this.size = null;
    },
    onClickUpdate(item) {
      this.state = "Update";
      this.title = `Elem módosítása • ${item.name}`;
      this.yes = null;
      this.no = "Mégsem";
      this.size = "lg";
      this.item = { ...item };
    },
    onClickTr(id) {
      this.selectedRowId = id;
    },
    yesEventHandler() {
      if (this.state == "Delete") {
        this.deleteItemById();
      }
    },
    saveItemHandler() {
      if (this.state === "Update") {
        this.updateItem();
      }
      this.modal.hide();
    },
  },
};
</script>
 
<style scoped>
</style>