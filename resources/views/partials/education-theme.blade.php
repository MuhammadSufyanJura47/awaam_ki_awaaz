<canvas id="edu-three-canvas" aria-hidden="true" style="position:fixed;inset:0;z-index:0;pointer-events:none"></canvas>
<style>
  :root{
    --edu-bg:#f8fafc;
    --edu-card:#ffffff;
    --edu-accent:#0ea5e9;
    --edu-text:#0f172a;
  }
  html,body{height:100%;background:var(--edu-bg);}
  .page-content{position:relative;z-index:10;min-height:100vh}
  .edu-card{background:var(--edu-card);box-shadow:0 6px 18px rgba(2,6,23,0.06);border:1px solid rgba(15,23,42,0.03)}
  .edu-btn{background:var(--edu-accent);}
</style>
<script src="https://unpkg.com/three@0.154.0/build/three.min.js"></script>
<script>
(function(){
  const canvas=document.getElementById('edu-three-canvas');
  if(!canvas) return;
  const renderer=new THREE.WebGLRenderer({canvas:canvas,antialias:true,alpha:true});
  const scene=new THREE.Scene();
  const camera=new THREE.PerspectiveCamera(50,window.innerWidth/window.innerHeight,0.1,1000);
  camera.position.z=40;
  renderer.setPixelRatio(window.devicePixelRatio||1);
  renderer.setSize(window.innerWidth,window.innerHeight,true);
  const geom=new THREE.BufferGeometry();
  const count= Math.min(400, Math.floor((window.innerWidth*window.innerHeight)/12000));
  const positions=new Float32Array(count*3);
  for(let i=0;i<count;i++){positions[i*3]=(Math.random()-0.5)*80;positions[i*3+1]=(Math.random()-0.5)*50;positions[i*3+2]=(Math.random()-0.5)*80;}
  geom.setAttribute('position',new THREE.BufferAttribute(positions,3));
  const mat=new THREE.PointsMaterial({color:0x0ea5e9,size:0.6,transparent:true,opacity:0.7});
  const points=new THREE.Points(geom,mat);
  scene.add(points);
  function onResize(){camera.aspect=window.innerWidth/window.innerHeight;camera.updateProjectionMatrix();renderer.setSize(window.innerWidth,window.innerHeight,true);}window.addEventListener('resize',onResize);
  let t=0;function animate(){t+=0.002;points.rotation.y=Math.sin(t)*0.2;points.rotation.x=Math.cos(t/2)*0.08;renderer.render(scene,camera);requestAnimationFrame(animate);}animate();
})();
</script>
