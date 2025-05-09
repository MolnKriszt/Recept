<template>
  <form
    @submit.prevent="onClickSubmit"
    class="row g-3 needs-validation was-validated"
  >
    <div class="col-md-4 position-relative">
      <label for="name" class="form-label">Name:</label>
      <input
        type="text"
        class="form-control"
        id="name"
        required
        v-model="itemForm.name"
      />
    </div>

    <div class="col-md-4 position-relative">
      <label for="email" class="form-label">Email:</label>
      <input
        type="text"
        class="form-control"
        id="email"
        required
        v-model="itemForm.email"
      />
    </div>

    <div class="col-md-4 position-relative">
      <label for="roleId" class="form-label">roleId:</label>
      <input
        type="text"
        class="form-control"
        id="roleId"
        required
        v-model="itemForm.role_id"
      />
    </div>

    <button type="submit" class="btn btn-success">Mentés</button>
  </form>
</template>

<script>
export default {
  props: ["itemForm"],
  emits: ["saveItem"],
  methods: {
    onClickSubmit() {
      this.$emit("saveItem", this.itemForm);
    },
  },
};
</script>