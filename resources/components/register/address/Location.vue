<template>
  <el-row>
    <el-col>
      <el-form ref="form">
        <sys-select
          label="UF"
          :url="route('ufs.select')"
          v-model="location.uf"
          @change="reloadCity"
          :rules="rulesUf"
          :key="1"
        />
        <sys-select
          label="Cidade"
          :url="route('cities.select')"
          v-model="location.city"
          ref="city"
          :rules="rulesCity"
            :key="2"
        />
        <el-form-item label="País">
          <el-input prop="pais" />
        </el-form-item>
      </el-form>
    </el-col>
  </el-row>
</template>

<script lang="ts" setup>
import { location } from "@/store/register/address/location";
import { ref } from "@vue/reactivity";
const city = ref();

function reloadCity() {
  location.city = ''
  city.value.params.uf_id = location.uf
  city.value.search({
    uf_id: location.uf,
  })
}
</script>
