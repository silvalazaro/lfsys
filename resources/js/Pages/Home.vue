<template>
  <div>
    <el-dialog v-model="showDialog" title="Escolha um perfil. Você pode trocar a qualquer momento.">
      <el-table :data="gridData">
        <el-table-column property="date" label="Date" width="150" />
        <el-table-column property="name" label="Name" width="200" />
        <el-table-column property="address" label="Address" />
      </el-table>
    </el-dialog>
  </div>
</template>

<script>
import { ref } from 'vue'

export default {
  setup() {
    const showDialog = ref(true)

    // expose to template and other options API hooks
    return {
      showDialog
    }
  },

  mounted() {
  }
}
</script>
