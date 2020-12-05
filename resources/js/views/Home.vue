<template>
  <div style="height: 100%; width: 100%">
    <div style="display: none">
      <p>First marker is placed at {{ withPopup.lat }}, {{ withPopup.lng }}</p>
      <p>Center is at {{ currentCenter }} and the zoom is: {{ currentZoom }}</p>
      <button @click="showLongText">Toggle long popup</button>
    </div>
    <l-map
      :zoom="zoom"
      :center="center"
      :options="mapOptions"
      @update:center="centerUpdate"
      @update:zoom="zoomUpdate"
    >
      <l-tile-layer :url="url" :attribution="attribution" />
      <l-control position="bottomleft">
        <b-form @submit="onSubmit" v-if="showAddForm">
          <b-tabs content-class="mt-3">
            <b-tab title="Қазақша" active>
              <div class="mt-3">
                Категориялар: <strong>{{ selected }}</strong>
              </div>
              <b-form-group>
                <b-form-select
                  v-model="selected"
                  :options="options"
                  size="sm"
                  class="mt-3"
                ></b-form-select>
              </b-form-group>
              <b-form-group
                class="btn-margin"
                label-cols="4"
                label-cols-lg="2"
                label-size="sm"
                label="Атауы"
                label-for="input-sm"
              >
                <b-form-input id="input-sm" size="sm"></b-form-input>
              </b-form-group>
              <p>
                Координаты: <input type="number" /> <input type="number" />
                <button>+</button>
              </p>

              <b-form-group
                label-cols="4"
                label-cols-lg="2"
                label-size="sm"
                label="Мекен-жайы"
                label-for="input-sm"
              >
                <b-form-input id="input-sm" size="sm"></b-form-input>
              </b-form-group>
              <b-form-group
                label-cols="4"
                label-cols-lg="2"
                label-size="sm"
                label="Контакті"
                label-for="input-sm"
              >
                <b-form-input id="input-sm" size="sm"></b-form-input>
              </b-form-group>
              <b-form-group
                label-cols="4"
                label-cols-lg="2"
                label-size="sm"
                label="Сипаты"
                label-for="input-sm"
              >
                <b-form-input id="input-sm" size="sm"></b-form-input>
              </b-form-group>
              <p>Фотолар:</p>
              <input
                multiple
                type="file"
                ref="inputFile1"
                style="display: none"
                @change="addFiles"
              />
              <b-button class="btn-margin" @click="chooseFile"
                >Фото қосу</b-button
              >

              <!-- <b-button class="btn-margin" @click="seveFile">Сақтау</b-button> -->
              <b-table
                striped
                hover
                :items="itemsLocal"
                :fields="fields"
              ></b-table>
            </b-tab>
            <b-tab title="Русский"> </b-tab>
            <b-tab title="English"> </b-tab>
          </b-tabs>
          <!-- <b-button class="btn-margin" type="submit" variant="primary"
            >Submit</b-button
          >
          <b-button class="btn-margin" type="reset" variant="danger"
            >Reset</b-button
          > -->
        </b-form>
        <b-button @click="showAddForm = !showAddForm">+</b-button>
      </l-control>
      <!-- <l-marker :lat-lng="withPopup">
        <l-popup>
          <div @click="innerClick">
            I am a popup
            <p v-show="showParagraph">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
              sed pretium nisl, ut sagittis sapien. Sed vel sollicitudin nisi.
              Donec finibus semper metus id malesuada.
            </p>
          </div>
        </l-popup>
      </l-marker>
      <l-marker :lat-lng="withTooltip">
        <l-tooltip :options="{ permanent: true, interactive: true }">
          <div @click="innerClick">
            I am a tooltip
            <p v-show="showParagraph">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
              sed pretium nisl, ut sagittis sapien. Sed vel sollicitudin nisi.
              Donec finibus semper metus id malesuada.
            </p>
          </div>
        </l-tooltip>
      </l-marker> -->
    </l-map>
  </div>
</template>

<script>
import { latLng } from "leaflet";
import {
  LMap,
  LTileLayer,
  LMarker,
  LPopup,
  LTooltip,
  LControl,
} from "vue2-leaflet";

export default {
  name: "Example",
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LTooltip,
    LControl,
  },
  data() {
    return {
      fields: [
        {
          key: "id",
          label: "",
        },
        {
          key: "name",
          label: "Фотолар",
        },
      ],
      itemsLocal: [],
      selected: null,
      options: [
        { value: null, text: "Вогзалы" },
        { value: "a", text: "Асхана" },
        { value: "b", text: "Selected Option" },
        { value: { C: "3PO" }, text: "This is an option with object value" },
        { value: "d", text: "This one is disabled", disabled: true },
      ],
      form: {
        kk: {},
        ru: {},
        en: {},
      },
      showAddForm: false,
      zoom: 11,
      center: latLng(43.257206, 76.886444),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      withPopup: latLng(47.41322, -1.219482),
      withTooltip: latLng(47.41422, -1.250482),
      currentZoom: 11,
      currentCenter: latLng(43.257206, 76.886444),
      showParagraph: false,
      mapOptions: {
        zoomSnap: 0.5,
      },
    };
  },
  methods: {
    clickHandler() {},
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
    showLongText() {
      this.showParagraph = !this.showParagraph;
    },
    innerClick() {
      alert("Click!");
    },
    chooseFile() {
      this.$refs.inputFile1.click();
    },
    // seveFile() {
    //   this.items.push(...this.$refs.inputFile1.files);
    // },
    addFiles() {
      console.log(this.$refs.inputFile1.files);
      this.itemsLocal.push(...this.$refs.inputFile1.files);
    },
  },
};
</script>
<style scoped>
.btn-margin {
  margin: 5px;
}
</style>
