<template>
  <b-container>
    <b-row>
      <b-col class="table-z">
        <b-table striped hover :items="items" :fields="fields">
          <template #cell(index)="data">
            {{ data.index + 1 }}
          </template>
          <template #cell(checkbox_name)="data">
            <b-form-checkbox
              v-model="data.item.isActivated"
              name="check-button"
              switch
              @change="userLock(data.item)"
            >
            </b-form-checkbox>
          </template>
        </b-table>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  data() {
    return {
      isActivated: false,
      fields: [
        { key: "index", label: "" },
        { key: "name", label: "Қолданушы" },
        { key: "checkbox_name", label: "Статус" },
      ],
      items: [{ id: 1, name: "Dickerson1", isActivated: true }],
    };
  },
  methods: {
    userLock(data) {
      alert("Бұғатталды");
    },
  },
};
</script>
