function List({ animals }) {
  return (
    <div className="col-7">
      <div className="card mt-4">
        <div className="card-header">
          <h2>List of animals</h2>
        </div>
        <div className="card-body">
          {
            animals.map((c, i) => <div key={i}> <b style={{
              textTransform: 'capitalize'
            }}
            >{c.animal}</b>: {c.weight} kg</div>)
          }
        </div>
      </div>
    </div>
  );
}

export default List;