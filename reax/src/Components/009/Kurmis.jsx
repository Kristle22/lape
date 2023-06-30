function Kurmis({ spalva, dydis, skaicius }) {

  return (
    <>
      <h2 style={{
        color: spalva,
        fontSize: dydis * 2 + 'px'
      }}>Kurmis {skaicius + 11}</h2>
      <span>Tirpdo kanalizacijos vamzdžiuose susikaupusius riebalus, muilo apnašas, suardo plaukus ir kitus teršalus.</span>
    </>
  );
}

export default Kurmis;