<script>
export default {
  data() {
    return {
      nominations: {},
      fetchError: false,
      fetchSuccess: false,
      message: '',
      noNominations: false,
    };
  },
  props: ['alert', 'isSuccess', 'isError', 'isEdited'],
  methods: {
    showDeletePanel: function(id) {
      document.getElementById('nomination-delete-' + id).style.display =
        'block';
    },
    hideDeletePanel: function(id) {
      document.getElementById('nomination-delete-' + id).style.display = 'none';
    },
    deleteNomination: function(slug) {
      var link = '/nominations/' + slug;
      var app = this;

      this.axios
        .delete(link)
        .then(function(response) {
        //   app.getNominations();
          app.fetchSuccess = true;
        })
        .catch(function(response) {
          app.fetchError = true;
          app.message = 'An error occured while deleting the nomination';
        });
    },
  },
};
</script>

<style lang="scss">
.nomination-header {
  margin-bottom: 5px;
  height: 25px;
}

.nomination-nominee {
  font-weight: bold;
  font-size: 16px;
}

.nomination-links {
  text-align: left;
  line-height: 25px;

  a {
    margin-right: 10px;
  }
}

@media (min-width: 768px) {
  .nomination-links {
    text-align: right;

    a {
      margin: 0 10px;
    }
  }
}

.nomination-group {
  margin: 20px 0;
}

.nomination-status {
  text-transform: capitalize;
}

.nomination-question {
  font-weight: 600;
  margin-bottom: 5px;
}

.nomination-arrow {
  color: #ffd700;
  line-height: 20px;
  margin-right: 10px;
}
</style>
