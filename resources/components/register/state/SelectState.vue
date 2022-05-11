<template>
  <sys-select
    v-model="value"
    label="Estado"
    :url="route('ufs.select')"
    class="w-1/6"
  />
</template>

<script lang="ts" setup>
import { State } from "@/models/register/state";
import { computed, ref } from "vue";

interface PropsInterface{
    modelValue: State | Array<State>
}

const props = defineProps<PropsInterface>()

const value = computed({
    get():number | Array<number> {
        return props.modelValue instanceof State ? props.modelValue.id : props.modelValue.map(e => e.id)
    },
    set(){
        pr
    }
})

</script>
