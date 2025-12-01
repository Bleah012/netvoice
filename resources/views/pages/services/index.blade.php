@extends('layouts.app')
@section('title', 'Services')

@section('content')

{{-- Hero Section --}}
<section class="bg-primary-blue text-white py-5">
  <div class="container">
    <div class="col-lg-8">
      <h1 class="mb-3 animate__animated animate__fadeInDown">Our Services</h1>
      <p class="lead text-gray-200 animate__animated animate__fadeInUp">
        Comprehensive ICT and solar solutions designed to empower your business with reliability, scalability, and innovation.
      </p>
    </div>
  </div>
</section>

{{-- Services Navigation Tabs --}}
<section class="bg-white py-4 border-bottom">
  <div class="container text-center">
    <ul class="nav nav-pills justify-content-center flex-wrap gap-2" role="tablist">
      <li class="nav-item"><a class="nav-link active" href="#structured-cabling">Structured Cabling</a></li>
      <li class="nav-item"><a class="nav-link" href="#network-integration">Network Integration</a></li>
      <li class="nav-item"><a class="nav-link" href="#voice-telephony">Voice & Telephone Systems</a></li>
      <li class="nav-item"><a class="nav-link" href="#video-surveillance">Digital Video Surveillance</a></li>
      <li class="nav-item"><a class="nav-link" href="#solar-electrical">Solar & Electrical Installations</a></li>
      <li class="nav-item"><a class="nav-link" href="#maintenance">Hardware & Software Maintenance</a></li>
    </ul>
  </div>
</section>

{{-- Structured Cabling --}}
<section id="structured-cabling" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <img src="{{ asset('images/services/structured_cabling.jpg') }}" alt="Structured Cabling" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-md-6">
        <h2 class="text-primary mb-3">Structured Cabling</h2>
        <h5 class="text-muted mb-3">Key Features</h5>
        <ul class="list-unstyled mb-4 text-muted">
          <li><i class="bi bi-check-circle text-success me-2"></i> Efficient infrastructure</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Scalable and flexible</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Reduced downtime</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Cost-effective</li>
        </ul>
        <h5 class="text-muted mb-3">Our Process</h5>
        <ol class="mb-4 text-muted">
          <li>Site survey</li>
          <li>Design and planning</li>
          <li>Installation</li>
          <li>Testing and certification</li>
        </ol>
      </div>
    </div>
  </div>
</section>

{{-- Network Integration --}}
<section id="network-integration" class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6 order-md-2">
        <img src="{{ asset('images/services/network_integration.jpg') }}" alt="Network Integration" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-md-6 order-md-1">
        <h2 class="text-primary mb-3">Network Integration</h2>
        <h5 class="text-muted mb-3">Key Features</h5>
        <ul class="list-unstyled mb-4 text-muted">
          <li><i class="bi bi-check-circle text-success me-2"></i> Network design and architecture</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Network security implementation</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Wireless network setup</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Network performance optimization</li>
        </ul>
        <h5 class="text-muted mb-3">Our Process</h5>
        <ol class="mb-4 text-muted">
          <li>Assessment & Planning</li>
          <li>Design & Implementation</li>
          <li>Testing & Optimization</li>
        </ol>
        <h5 class="text-muted mb-3">Trusted Partners & Vendors</h5>
        <div class="d-flex flex-wrap gap-2">
          <span class="badge bg-secondary">Cisco</span>
          <span class="badge bg-secondary">HPE</span>
          <span class="badge bg-secondary">Netgear</span>
          <span class="badge bg-secondary">Ubiquiti</span>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Voice & Telephone Systems --}}
<section id="voice-telephony" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <img src="{{ asset('images/services/voice_telephony.jpg') }}" alt="Voice & Telephone Systems" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-md-6">
        <h2 class="text-primary mb-3">Voice & Telephone Systems</h2>
        <h5 class="text-muted mb-3">Key Features</h5>
        <ul class="list-unstyled mb-4 text-muted">
          <li><i class="bi bi-check-circle text-success me-2"></i> On-premise & cloud-based solutions</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Unified communications & VoIP</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Mobile & remote communication</li>
        </ul>
        <h5 class="text-muted mb-3">Our Process</h5>
        <ol class="mb-4 text-muted">
          <li>Requirements Analysis</li>
          <li>System Installation</li>
          <li>Training & Support</li>
        </ol>
        <h5 class="text-muted mb-3">Trusted Partners & Vendors</h5>
        <div class="d-flex flex-wrap gap-2">
          <span class="badge bg-secondary">Cisco</span>
          <span class="badge bg-secondary">Avaya</span>
          <span class="badge bg-secondary">Grandstream</span>
          <span class="badge bg-secondary">Yealink</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Digital Video Surveillance --}}
<section id="video-surveillance" class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6 order-md-2">
        <img src="{{ asset('images/services/video_surveillance.jpg') }}" alt="Digital Video Surveillance" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-md-6 order-md-1">
        <h2 class="text-primary mb-3">Digital Video Surveillance</h2>
        <h5 class="text-muted mb-3">Key Features</h5>
        <ul class="list-unstyled mb-4 text-muted">
          <li><i class="bi bi-check-circle text-success me-2"></i> Cloud & secure local integration</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Remote access</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Real-time monitoring</li>
        </ul>
        <h5 class="text-muted mb-3">Our Process</h5>
        <ol class="mb-4 text-muted">
          <li>Site Survey</li>
          <li>Camera Installation</li>
          <li>System Configuration</li>
        </ol>
        <h5 class="text-muted mb-3">Trusted Partners & Vendors</h5>
        <div class="d-flex flex-wrap gap-2">
          <span class="badge bg-secondary">Hikvision</span>
          <span class="badge bg-secondary">Dahua</span>
          <span class="badge bg-secondary">Axis</span>
          <span class="badge bg-secondary">Avigilon</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Solar & Electrical Installations --}}
<section id="solar-electrical" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <img src="{{ asset('images/services/solar_electrical.jpg') }}" alt="Solar & Electrical Installations" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-md-6">
        <h2 class="text-primary mb-3">Solar & Electrical Installations</h2>
        <h5 class="text-muted mb-3">Key Features</h5>
        <ul class="list-unstyled mb-4 text-muted">
          <li><i class="bi bi-check-circle text-success me-2"></i> Solar power & backup battery systems</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Green, cost-efficient energy</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Reliable electrical grids</li>
        </ul>
        <h5 class="text-muted mb-3">Our Process</h5>
        <ol class="mb-4 text-muted">
          <li>Site Assessment</li>
          <li>System Design</li>
          <li>Installation</li>
          <li>Testing & Commissioning</li>
        </ol>
        <h5 class="text-muted mb-3">Trusted Partners & Vendors</h5>
        <div class="d-flex flex-wrap gap-2">
          <span class="badge bg-secondary">Canadian Solar</span>
          <span class="badge bg-secondary">Fronius</span>
          <span class="badge bg-secondary">SMA</span>
          <span class="badge bg-secondary">Tesla</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Hardware & Software Maintenance --}}
<section id="maintenance" class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6 order-md-2">
        <img src="{{ asset('images/services/hardware_software.jpg') }}" alt="Hardware & Software Maintenance" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-md-6 order-md-1">
        <h2 class="text-primary mb-3">Hardware & Software Maintenance</h2>
        <h5 class="text-muted mb-3">Key Features</h5>
        <ul class="list-unstyled mb-4 text-muted">
          <li><i class="bi bi-check-circle text-success me-2"></i> Hardware maintenance & break/repair</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Software updates & system optimization</li>
          <li><i class="bi bi-check-circle text-success me-2"></i> Network monitoring & antivirus support</li>
        </ul>
        <h5 class="text-muted mb-3">Our Process</h5>
        <ol class="mb-4 text-muted">
          <li>Maintenance Planning</li>
          <li>Regular Inspections</li>
          <li>Preventive Support</li>
        </ol>
        <h5 class="text-muted mb-3">Trusted Partners & Vendors</h5>
        <div class="d-flex flex-wrap gap-2">
          <span class="badge bg-secondary">Microsoft</span>
          <span class="badge bg-secondary">Dell</span>
          <span class="badge bg-secondary">Lenovo</span>
        </div>
      </div>
    </div>
  </div>
</section>
