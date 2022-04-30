<template>
  <div>
    <el-row :gutter="20">
      <el-col>
        <div class="flex">
          <input-cep class="w-2/6" />
          <sys-input v-model="location.street" label="Logradouro" class="w-4/6 ml-2" />
          <sys-input v-model="address.number" label="Número" class="w-2/6 ml-2" />
        </div>
      </el-col>
    </el-row>
    <el-row :gutter="20">
      <el-col>
        <div class="flex">
            <sys-select v-model="location.uf" label="Estado" :url="route('ufs.select')" class="w-1/6" />
            <sys-select v-model="location.city" label="Cidade" :url="route('cities.select')"  class="w-2/6 ml-2" />
            <sys-input v-model="location.district" label="Bairro" class="w-2/6 ml-2" />
            <sys-input v-model="location.country" label="País" class="w-1/6 ml-2" disabled />
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script lang="ts" setup>
import { reactive, ref } from "vue";
import { location } from "@/store/register/address/location";
import { Address, createRules } from "@/models/register/Address";

const address = reactive(new Address());
const form = ref(null);

const rules = createRules();

const options = [];
</script>
