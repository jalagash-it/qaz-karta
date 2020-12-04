<template>
  <div class="main-container">
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">QAZ-KARTA</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
<!--
      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href="#">Link</b-nav-item>
          <b-nav-item href="#" disabled>Disabled</b-nav-item>
        </b-navbar-nav>

         Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form>
            <b-form-input
              size="sm"
              class="mr-sm-2"
              :placeholder="$t('navbar.search')"
            ></b-form-input>
            <b-button size="sm" class="my-2 my-sm-0" type="submit">
              {{ $t("navbar.search") }}
            </b-button>
          </b-nav-form>

          <b-nav-item-dropdown :text="$t('navbar.lang')" right>
            <b-dropdown-item
              href="#"
              v-for="(lang, i) in ['kk', 'ru', 'en']"
              :key="i"
              @click="$i18n.locale = lang"
            >
              {{ lang }}
            </b-dropdown-item>
          </b-nav-item-dropdown>

          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <em>{{ $t("navbar.user") }}</em>
            </template>
            <b-dropdown-item href="#">
              {{ $t("navbar.profile") }}
            </b-dropdown-item>
            <b-dropdown-item href="#">
              {{ $t("navbar.Signout") }}
            </b-dropdown-item>
          </b-nav-item-dropdown>
          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <em>{{ $t("navbar.guest") }}</em>
            </template>
            <b-dropdown-item href="#">
              {{ $t("navbar.login") }}
            </b-dropdown-item>
            <b-dropdown-item href="#">
              {{ $t("navbar.register") }}
            </b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <router-view class="router-view"></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  mounted() {
    window["test"] = this;
  },
};
</script>
<style>
.main-container {
  display: flex;
  flex-direction: column;
  height: 100vh;
}
.navbar {
  flex-grow: 0;
}
.router-view {
  flex-grow: 1;
}
</style>